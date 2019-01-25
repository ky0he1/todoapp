<?php

namespace App\Http\Requests;

use App\Task;
use Illuminate\Validation\Rule;

class EditTask extends CreateTask
{
    public function rules()
    {
        $rule = parent::rules();

        $status_rule = Rule::in(array_keys(Task::STATUS));

        return $rule + [
            'status' => 'required | ' . $status_rule,
        ];
    }

    public function attributes()
    {
        $attributes = parent::attributes();

        return $attributes + [
            'status' => '状態',
        ];
    }

    public function messages()
    {
        $messages = parent::messages();

        foreach (Task::STATUS as $key => $val) {
            $status_labels[] = $val['label'];
        }

        $status_labels = implode(', ', $status_labels);

        return $messages + [
            'status.in' => ':attributeには ' . $status_labels . ' のいずれかを指定してください。',
        ];
    }
}
