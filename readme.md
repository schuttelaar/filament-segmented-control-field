# segmented control field for Filamentphp

Inspired by [material design](https://m3.material.io/components/segmented-buttons/overview)

Options should be an array where the key is the value that will be stored if selected. Every item should have a 'label' defined. Icon and tooltip are optional

By default only one button can be active. You can change this by setting multi to 1.

```
SegmentedControlField::make('control_buttons')
->options([
	1 => [
		'label' => 'button 1',
		'icon' => 'heroicon-o-moon',
		'tooltip' => 'tooltip text'
	],
	2 => [
		'label' => 'button 2',
		'icon' => 'heroicon-s-sun',
		'tooltip' => 'tooltip text 2'
	]
])->multi(0),
```
