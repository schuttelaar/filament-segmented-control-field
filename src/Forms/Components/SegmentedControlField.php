<?php

// app/Filament/Fields/SegmentedControlField.php

namespace Schuttelaar\Filament\Forms\Components;

use Filament\Forms\Components\Field;
use Closure;

class SegmentedControlField extends Field
{
    protected string $view = 'filament-segmented-control-field::forms.components.segmented-control';
	protected array $options = [];
	protected bool $multi;

    protected function setUp(): void
    {
        parent::setUp();

        $this->default([]);

        $this->afterStateHydrated(static function (Field $component, $state) {
            if (is_array($state)) {
                return;
            }

            $component->state([]);
        });

    }

	public function multi(bool | Closure $multi = true):self {
		$this->multi = $multi;

		return $this;
	}

    public function isMulti(): int
    {
        return isset($this->multi) && $this->multi ? 1 : 0;
    }

    public function options(array | Closure $options): self
    {
        if (is_callable($options)) {
            $options = $options();
        }
        $this->options = [];

        foreach ($options as $option) {
            $this->options[] = $option;
        }

        return $this;
    }

	public function getOptions(): array {
		return $this->options;
	}
}