<?php
namespace App\Nova\Traits;

trait RuleTrait
{
    /**
     * @param $field
     * @return array|null
     */
    public function fieldRules($field)
    {
        if (empty(static::$request)) {
            return null;
        }

        $rules = optional((new static::$request)->rules())[$field];
        $rules = explode('|', $rules);

        foreach ($rules as $key => &$rule) {
            if (!empty(static::$model)
                    && $rule == 'required'
                    && !empty($this->getKey())) {
                unset($rules[$key]);
            }
        }

        return $rules;
    }
}
