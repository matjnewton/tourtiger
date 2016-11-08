$(document).ready(function() {

$(".wp-picker-container").spectrum({
    color: tinycolor,
    flat: bool,
    showInput: bool,
    showInitial: bool,
    allowEmpty: bool,
    showAlpha: bool,
    disabled: bool,
    localStorageKey: string,
    showPalette: bool,
    showPaletteOnly: bool,
    showSelectionPalette: bool,
    clickoutFiresChange: bool,
    cancelText: string,
    chooseText: string,
    containerClassName: string,
    replacerClassName: string,
    preferredFormat: string,
    maxSelectionSize: int,
    palette: [[string]],
    selectionPalette: [string]
});
	
});
