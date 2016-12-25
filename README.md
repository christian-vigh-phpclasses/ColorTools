# INTRODUCTION #

The **Color** class allows for conversion between different colorimetric models, namely :

- RGB
- HSL
- HSB
- CMY
- CMYK
- Gray scale
- Websafe
- or simply a color name, defined in the *ColorNames.txt* file supplied in this package

# EXAMPLE #

Instantianting a **Color** object will automatically convert the color you supplied to all the other colorimetric schemes :

	$color 	=  new Color ( 'White' ) ;

The above example found the color you specified in the *ColorNames.txt* file, and converted this color name to all other colorimetric models currently support, which are accessible as properties ; for example :

	$color -> RGB

is an array of three elements, containing the Red, Green and Blue parts of the color you supplied to the constructor (White), so it will contain the values 0xFF, 0xFF and 0xFF.

You can reuse an existing **Color** object to specify another color, using the *SetColor()* method :

	$color -> SetColor ( '#0000FF' ) ;

The class will recognize the specified value to be "Blue", a value which will be accessible through the *$ColorName* property.

See the **Reference** section for more information about methods, properties and constants available for this class.

# REFERENCE #

## Methods ##

### Constructor ###

	$color 	=  new Color ( $value, $model = null ) ;

Creates a **Color** object using the specified color value, which can have one of the following forms :

- A color name, as defined in file *ColorNames.txt'
- An HTML/CSS color specification, in the form *#digits*. Such RGB values can take various forms (ie, they can contain 3 or 6 digits). See the *NormalizeRGBValue* for a description of the various forms you can specify, and that will be normalized. 
- RGB(r,g,b) (or RVB) : Specifies an RGB value
- HSL(h,s,l) (or TSL) : Color using the HSL model
- HSB(h,s,b) (or HSV or TSV) : Color using the HSB model
- WebSafe(r,g,b) (or WSafe or WSRGB or WRGB) : An RGB color that will be converted to a websafe color
- CMY(c,m,y) (or CMJ) : Specifies a Cyan/Magenta/Yellow color value
- CMYK(c,m,y,l) (or CMJN) : Specifies a Cyan/Magenta/Yellow/Black color value
- GRAYSCALE(v) (or GSCALE or GS) : A grayscale color value.
- An array of individual byte values
- An integer value

Color names are not case-sensitive, as well as keywords such as RGB, GRAYSCALE, etc.

If a single integer or an array of bytes is specified, the caller must specify a constant of type **COLOR\_SCHEME\_\*** to indicate which colorimetric model is to be used for interpreting the value. 

### NormalizedRGBValue ###

	$result = Color::NormalizedRGBValue ( $value ) ;

Normalizes an RGB value by applying the following process :

- Adds a leading '#' if none present
- If exactly 3 characters are specified, the digits are doubled. For example, "#123"
  will yield to "#112233".
- If less than 6 characters are specified, leading zeros are added.
- Hex digits are converted to uppercase.

The function returns the normalized RGB value as a string, or *false* if an error occurred.

### SetColor ###

	$color -> SetColor ( $value, $model = null ) ;

Assigns a new color to the specified object. All the colorimetric properties are recomputed after that.

### ToArray ###

	$array 	=  $color -> ToArray ( ) ;

Returns an associative array having the following entries :

- 'RGBString' : 	The HTML string corresponding to the color's RGB value.
- 'ColorName' : Color name, if a match has been found.
- 'RGB' : An array of three values, corresponding to the RGB colorimetric model.
- 'HSL' : Same, for the HSL colorimetric model.
- 'HSB' : Same, for the HSB colorimetric model.
- 'CMY' : Same, for the CMY colorimetric model.
- 'CMYK' : An array of four values, corresponding to the CMYK colorimetric model.
- 'WebSafe' : An array of three RGB values, considered to be web-safe (ie, correctly rendered by most navigators).
- 'GrayScale' : 	An array of three RGB values, corresponding to the associated color in the	gray colorimetric model.


## Properties ##

All the properties listed in the following section should be considered as read-only.

### RGBString ###

The normalized RGB color, that can be used as is for any css or HTML color attribute.

### ColorName ###

Human-readable color name. This value will be an empty string if the color has no correspondance in the file *ColorNames.txt*.

### RGB ###

A set of 3 byte values for the RGB colorimetric model.

### HSL ###

A set of 3 byte values for the HSL colorimetric model.

### HSB ###

A set of 3 byte values for the HSB colorimetric model.

### CMY ###

A set of 3 byte values for the CMY colorimetric model.

### CMYK ###

A set of 4 byte values for the CMYK colorimetric model.

### WebSafe ###

A set of 3 byte values for the Websafe RGB colorimetric model.

### GrayScale ###

A set of 3 byte values corresponding to the grayscale version of the underlying color.

## Constants ##

The **Color** class defines the following constants, which indicate the colorimetric model associated to a string ; such a constant must be specified to either the class constructor or the *SetValue()* method, when the specified value does not allow to determine which colorimetric model is to be used :

- COLOR\_SCHEME\_RGB
- COLOR\_SCHEME\_HSL
- COLOR\_SCHEME\_HSB
- COLOR\_SCHEME\_WEBSAFE
- COLOR\_SCHEME\_CMY
- COLOR\_SCHEME\_CMYK
- COLOR\_SCHEME\_GRAYSCALE
