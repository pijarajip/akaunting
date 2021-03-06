@stack($name . '_input_start')

    <div
        class="form-group {{ $col }}{{ isset($attributes['required']) ? ' required' : '' }}{{ isset($attributes['readonly']) ? ' readonly' : '' }}{{ isset($attributes['disabled']) ? ' disabled' : '' }}"
        :class="[{'has-error': errors.{{ $name }}}]">
        @if (!empty($text))
            {!! Form::label($name, $text, ['class' => 'form-control-label'])!!}
        @endif

        <div class="input-group input-group-merge">
            <akaunting-dropzone-file-upload
                @if (!empty($attributes['dropzone-class']))
                class="{{ $attributes['dropzone-class'] }}"
                @endif
                @if (!empty($attributes['options']))
                    @if (isset($attributes['options']['maxFiles']))
                        :options={{ json_encode($attributes['options']) }}
                    @else
                        @php $attributes['options']['maxFiles'] = 1 @endphp
                        :options={{ json_encode($attributes['options']) }}
                    @endif
                @endif
                @if (!empty($attributes['multiple']))
                multiple
                @endif
                @if (!empty($attributes['isPreviewSingle']))
                :is-preview-single="{{ $attributes['isPreviewSingle'] }}"
                @endif
                v-model="{{ !empty($attributes['v-model']) ? $attributes['v-model'] : (!empty($attributes['data-field']) ? 'form.' . $attributes['data-field'] . '.'. $name : 'form.' . $name) }}"
            ></akaunting-dropzone-file-upload>
        </div>

        <div class="invalid-feedback d-block"
            v-if="{{ isset($attributes['v-error']) ? $attributes['v-error'] : 'form.errors.has("' . $name . '")' }}"
            v-html="{{ isset($attributes['v-error-message']) ? $attributes['v-error-message'] : 'form.errors.get("' . $name . '")' }}">
        </div>
    </div>

@stack($name . '_input_end')
