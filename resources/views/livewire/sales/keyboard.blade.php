<script>
    KioskBoard.init({
        /*!* Required* An Array of Objects has to be defined for the custom keys. Hint: Each object creates a row element (HTML) on the keyboard.* e.g. [{"key":"value"}, {"key":"value"}] => [{"0":"A","1":"B","2":"C"}, {"0":"D","1":"E","2":"F"}]*/
        keysArrayOfObjects: [{
            "0": "Q",
            "1": "W",
            "2": "E",
            "3": "R",
            "4": "T",
            "5": "Y",
            "6": "U",
            "7": "I",
            "8": "O",
            "9": "P"
        }, {
            "0": "A",
            "1": "S",
            "2": "D",
            "3": "F",
            "4": "G",
            "5": "H",
            "6": "J",
            "7": "K",
            "8": "L"
        }, {
            "0": "Z",
            "1": "X",
            "2": "C",
            "3": "V",
            "4": "B",
            "5": "N",
            "6": "M",
            "7": ",",
            "8": ".",
            "9": "@",

        }],
        /*!* Required only if "keysArrayOfObjects" is "null".* The path of the "kioskboard-keys-${langugage}.json" file must be set to the "keysJsonUrl" option. (XMLHttpRequest to get the keys from JSON file.)* e.g. '/Content/Plugins/KioskBoard/dist/kioskboard-keys-english.json'*/
        keysJsonUrl: null,
        /** Optional: (Special Characters)* An Array of Strings can be set to override the built-in special characters.* e.g. ["#", "$", "%", "+", "-", "*"]*/
        keysSpecialCharsArrayOfStrings: ["#", "Enter"],
        /** Optional: (Numpad Keys)* An Array of Numbers can be set to override the built-in numpad keys. (From 0 to 9, in any order.)* e.g. [1, 2, 3, 4, 5, 6, 7, 8, 9, 0]*/
        keysNumpadArrayOfNumbers: [1, 2, 3, 4, 5, 6, 7, 8, 9, 0],
        theme: 'flat',
        language: 'es',
        // Optional: (Other Options)// Language Code (ISO 639-1) for custom keys (for language support) => e.g. "de" || "en" || "fr" || "hu" || "tr" etc...language: 'en',// The theme of keyboard => "light" || "dark" || "flat" || "material" || "oldschool"theme: 'light',// Uppercase or lowercase to start. Uppercased when "true"capsLockActive: true,// Allow or prevent real/physical keyboard usage. Prevented when "false"// In addition, the "allowMobileKeyboard" option must be "true" as well, if the real/physical keyboard has wanted to be used.allowRealKeyboard: false,// Allow or prevent mobile keyboard usage. Prevented when "false"allowMobileKeyboard: false,// CSS animations for opening or closing the keyboardcssAnimations: true,// CSS animations duration as millisecondcssAnimationsDuration: 360,// CSS animations style for opening or closing the keyboard => "slide" || "fade"cssAnimationsStyle: 'slide',// Allow or deny Spacebar on the keyboard. The Spacebar will be passive when "false"keysAllowSpacebar: true,// Text of the space key (Spacebar). Without text => " "keysSpacebarText: 'Space',// Font family of the keyskeysFontFamily: 'sans-serif',// Font size of the keyskeysFontSize: '22px',// Font weight of the keyskeysFontWeight: 'normal',// Size of the icon keyskeysIconSize: '25px',// Scrolls the document to the top of the input/textarea element. Prevented when "false"autoScroll: true,
    });
    // 
    KioskBoard.run('.kioskboard', {});
</script>