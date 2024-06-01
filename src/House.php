<?php
declare(strict_types=1);
namespace LFreeze\BuilderPattern;

readonly final class House{

    private string $yane;
    private int $kaisu;
    private string $zaishitsu;
    private string $area;
    private string $niwa;
    private bool $chushajo;
    private string $owner;

    private function __construct(array $vars) {
        $setField = function(string $propertyName, mixed $value) {
            if (!is_null($value)) {
                $this->$propertyName = $value;
            }
        };
        $setField('owner', $vars['owner'] ?? null);
        $setField('kaisu', $vars['kaisu'] ?? null);
        $setField('zaishitsu', $vars['zaishitsu'] ?? null);
        $setField('area', $vars['area'] ?? null);
        $setField('niwa', $vars['niwa'] ?? null);
        $setField('chushajo', $vars['chushajo'] ?? null);
        $setField('yane', $vars['yane'] ?? null);
    }

    public function getProperties(): array {
        return get_object_vars($this);
    }

    public static function builder(string $owner): Inner\Builder {
        return new Inner\Builder($owner);
    }
}

namespace LFreeze\BuilderPattern\Inner;

use Closure;

final class Builder {
    private string $yane;
    private int $kaisu;
    private string $zaishitsu;
    private string $area;
    private string $niwa;
    private bool $chushajo;
    private string $owner;

    public function __construct(string $value) {
        $this->owner = $value;
        return $this;
    }
    public function yane(string $value) :self {
        $this->yane = $value;
        return $this;
    }
    public function kaisu(int $value) :self {
        $this->kaisu = $value;
        return $this;
    }
    public function zaishitsu(string $value) :self {
        $this->zaishitsu = $value;
        return $this;
    }
    public function area(string $value) :self {
        $this->area = $value;
        return $this;
    }
    public function niwa(string $value) :self {
        $this->niwa = $value;
        return $this;
    }
    public function chushajo(bool $value) :self {
        $this->chushajo = $value;
        return $this;
    }

    public function build(): \LFreeze\BuilderPattern\House {
        $vars = get_object_vars($this);
        return Closure::bind(
            fn()=> new \LFreeze\BuilderPattern\House($vars),
            $this,
            \LFreeze\BuilderPattern\House::class
        )();
    }
}
