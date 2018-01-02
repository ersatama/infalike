function CanvasText()
{
    // The property that will contain the ID attribute value.
    this.canvasId = null;
    // The property that will contain the Canvas element.
    this.canvas = null;
    // The property that will contain the canvas context.
    this.context = null;
    // The property that will contain the created style class.
    this.savedClasses = Array();
    // The property that will contain cached text.
    this.cache = Array();
    // The property that will contain the cached image.
    this.savedCache = Array();
    // The property that will contain the buffer/cache canvas.
    this.cacheCanvas = null;
    // The property that will contain the cacheCanvas context.
    this.cacheContext = null;

    /*
     * Default values.
     */
    this.fontFamily = "Verdana";
    this.fontWeight = "normal";
    this.fontSize = "12px";
    this.fontColor = "#F00";
    this.textAlign = "start";
    this.textBaseline = "alphabetic";
    this.lineHeight = "20";

    /**
     * Benckmark variables.
     */
    this.initTime = null;
    this.endTime = null;

    /**
     * Set the main values.
     * @param object config Text properties.
     */
    this.config = function(config)
    {
        /*
         * A simple check. If config is not an object popup an alert.
         */
        if(typeof(config) != "object")
        {
            alert("¡Invalid configuration!");
            return false;
        }
        /*
         * Loop the config properties.
         */
        for(var property in config)
        {
            // If it's a valid property, save it.
            if(this[property] !== undefined)
                this[property] = config[property];
        }
    };

    /**
     * @param object textInfo Contains the Text string, axis X value and axis Y value.
     */
    this.drawText = function(textInfo)
    {
        this.initTime  = new Date().getTime();
        /*
         * If this.canvas doesn't exist we will try to set it.
         * This will be done the first execution time.
         */
        if(this.canvas == null)
        {
            if(!this.getCanvas())
            {
                alert("Incorrect canvas ID!");
                return false;
            }
        }
        // A simple comprovation.
        if(typeof(textInfo) != "object")
        {
            alert("Invalid text format!");
            return false;
        }
        // Another simple comprovation
        if(!this.isNumber(textInfo.x)
        || !this.isNumber(textInfo.y))
        {
            alert("You should specify a correct \"x\" & \"y\" axis value.")
            return false;
        }

        /**
         * Get or set the cache if a cacheId exist.
         */
        if(textInfo.cacheId != undefined)
        {
            // If cache exists: draw text and stop script execution.
            if(this.getCache(textInfo))
            {
                this.context.drawImage(this.savedCache[textInfo.cacheId],0,0);
                this.endTime = new Date().getTime();
                //console.log((this.endTime-this.initTime)/1000);
                return false;
            }
        }
        // Save the current context so we can restore it at the end
        // of the execution.
        this.cacheContext.save();
        // Set the color.
        this.cacheContext.fillStyle = this.fontColor;
        // Set the size & font family.
        this.cacheContext.font = this.fontWeight+' '+this.fontSize+' '+this.fontFamily;
        // Parse and draw the styled text.
        this.drawStyledText(textInfo);
        // Draw the final result to the context.
        this.context.drawImage(this.cacheCanvas,0,0);
        // Cache the result.
        if(textInfo.cacheId != undefined)
            this.saveCache(textInfo.cacheId);
        // Restore the context.
        this.cacheContext.restore();

        this.endTime  = new Date().getTime();
        //console.log((this.endTime-this.initTime)/1000);
    };

    /**
     * The "painter". This will draw the styled text.
     */
    this.drawStyledText = function(textInfo)
    {
        // Save the textInfo into separated vars to work more comfortably.
        var text = textInfo.text;
        var x = textInfo.x;
        var y = textInfo.y;
        // Declaration of needed vars.
        var properties,property,propertyName,propertyValue;
        var classDefinition,proColor,proFont,proText;
        // The main regex. Looks for <style>, <class> or <br /> tags.
        var match = text.match(/<\s*br\s*\/>|<\s*class=["|']([^"|']+)["|']\s*\>([^>]+)\<\s*\/class\s*\>|\<\s*style=["|']([^"|']+)["|']\s*\>([^>]+)\<\s*\/style\s*\>|[^<]+/g);
        var innerMatch = null;

        // Let's draw something for each match found.
        for(var i = 0; i < match.length; i++)
        {
            // Save the current context.
            this.cacheContext.save();
            // Default color
            proColor = this.fontColor;
            // Default font
            proFont = this.fontWeight+' '+this.fontSize+' '+this.fontFamily;

            // Check if current fragment is an style tag.
            if(/<\s*style=/i.test(match[i]))
            {
                // Looks the attributes and text inside the style tag.
                innerMatch = match[i].match(/<\s*style=["|']([^"|']+)["|']\s*\>([^>]+)\<\s*\/style\s*\>/);
                    
                // innerMatch[1] contains the properties of the attribute.
                properties = innerMatch[1].split(";");

                // Apply styles for each property.
                for(var j=0;j<properties.length;j++)
                {
                    // Each property have a value. We split them.
                    property = properties[j].split(":");
                    // A simple check.
                    if(this.isEmpty(property[0])
                    || this.isEmpty(property[1]))
                    {
                        // Wrong property name or value. We jump to the
                        // next loop.
                        continue;
                    }
                    // Again, save it into friendly-named variables to work comfortably.
                    propertyName = property[0];
                    propertyValue = property[1];

                    switch(propertyName)
                    {
                        case "font":
                            proFont = proFont.replace(this.fontWeight+' '+this.fontSize+' '+this.fontFamily,propertyValue);
                            break;
                        case "font-family":
                            proFont = proFont.replace(this.fontFamily,propertyValue);
                            break;
                        case "font-weight":
                            proFont = proFont.replace(this.fontWeight,propertyValue);
                            break;
                        case "font-size":
                            proFont = proFont.replace(this.fontSize,propertyValue);
                            break;
                        case "color":
                            if(this.isHex(propertyValue))
                                proColor = propertyValue;
                            break;
                    }
                }
                proText = innerMatch[2];
            
            }
            // Check if current fragment is a class tag.
            else if(/<\s*class=/i.test(match[i]))
            {
                // Looks the attributes and text inside the class tag.
                innerMatch = match[i].match(/<\s*class=["|']([^"|']+)["|']\s*\>([^>]+)\<\s*\/class\s*\>/);
               
                classDefinition = this.getClass(innerMatch[1]);
                /*
                 * Loop the class properties.
                 */
                for(var atribute in classDefinition)
                {
                    switch(atribute)
                    {
                        case "font":
                            proFont = proFont.replace(this.fontWeight+' '+this.fontSize+' '+this.fontFamily,classDefinition[atribute]);
                            break;
                        case "fontFamily":
                            proFont = proFont.replace(this.fontFamily,classDefinition[atribute]);
                            break;
                        case "fontWeight":
                            proFont = proFont.replace(this.fontWeight,classDefinition[atribute]);
                            break;
                        case "fontSize":
                            proFont = proFont.replace(this.fontSize,classDefinition[atribute]);
                            break;
                        case "fontColor":
                            if(this.isHex(classDefinition[atribute]))
                                proColor = classDefinition[atribute];
                            break;
                    }
                }
                proText = innerMatch[2];
            }
            // Check if current fragment is a line jump.
            else if(/<\s*br\s*\/>/i.test(match[i]))
            {
                y += parseInt(this.lineHeight)*2;
                x = textInfo.x;
                continue;
            }
            // Text without special style.
            else
            {
                proText = match[i];
            }

            // Set the text Baseline
            this.cacheContext.textBaseline = this.textBaseline;
            // Set the text align
            this.cacheContext.textAlign = this.textAlign;
            // Set the size & fonr family.
            this.cacheContext.font = proFont;
            // Set the color.
            this.cacheContext.fillStyle = proColor;
            // Draw the text.
            this.cacheContext.fillText(/* String */ proText, /* Number */ x, /* Number */y);
            // Increment X position based on current text measure.
            x += this.cacheContext.measureText(proText).width;

            this.cacheContext.restore();
        }
    };

    /**
     * Save a new class definition.
     */
    this.defineClass = function(id,definition)
    {
        // A simple comprovation.
        if(typeof(definition) != "object")
        {
            alert("¡Invalid class!");
            return false;
        }
        // Another simple comprovation.
        if(this.isEmpty(id))
        {
            alert("You must specify a Class Name.");
            return false;
        }

        // Save it.
        this.savedClasses[id] = definition;
        return true;
    };

    /**
     * Returns a saved class.
     */
    this.getClass = function(id)
    {
        if(this.savedClasses[id] !== undefined)
            return this.savedClasses[id];
    }
    
    this.getCanvas = function()
    {
        // We need a valid ID
        if(this.canvasId == null)
        {
            alert("You must specify the canvas ID!")
            return false;
        }
        // Let's save the Canvas into our class property...
        this.canvas = this.canvasId
        // ... and save its context too.
        this.context = this.canvas.getContext('2d');

        // We will draw the text into the cache canvas
        this.cacheCanvas = document.createElement('canvas');
        this.cacheCanvas.width = this.canvas.width;
        this.cacheCanvas.height = this.canvas.height;
        this.cacheContext = this.cacheCanvas.getContext('2d');

        return true;
    };

    /**
     * Get caché
     */
    this.getCache = function(txtObj)
    {
        /*
         * Check if cache Id already exist.
         */
        for(var cachedObj in this.cache)
        {            
            if(this.cache[txtObj.cacheId] !== undefined)
                return true;
        }

        // If cache Id doesn't exist, save it.
        this.setCache(txtObj);
        return false;
    }

    /**
     * Set cache.
     */
    this.setCache = function(txtObj)
    {
        this.cache[txtObj.cacheId] = txtObj;
    }

    /**
     * Save image result.
     */
    this.saveCache = function(id)
    {
        this.savedCache[id] = this.cacheCanvas;
    }

    /**
     * A simple function to validate a Hex code.
     */
    this.isHex = function(hex)
    {
        return (/^(#[a-fA-F0-9]{3,6})$/i.test(hex));
    };
    /**
     * A simple function to check if the given value is a number.
     */
    this.isNumber = function(n)
    {
        return !isNaN(parseFloat(n)) && isFinite(n);
    };
    /**
     * A simple function to check if the given value is empty.
     */
    this.isEmpty = function(str)
    {
        // Remove white spaces.
        str= str.replace(/^\s+|\s+$/, '');
        return str.length==0;
    };
}