<div {{ $attributes->merge(['class'=>'card-glass']) }}>
    <div class="text-center pt-6">
        <h3 class="text-lg text-black font-bold">Filtres :</h3>
    </div>
{{--    <div>--}}
{{--        <div class="form-group">--}}
{{--            <label for="filter-name">Name</label>--}}
{{--            <input type="text" class="form-control" id="filter-name" name="name" placeholder="Name" value="{{ $filter->name }}">--}}
{{--        </div>--}}
{{--        <div class="form-group">--}}
{{--            <label for="filter-description">Description</label>--}}
{{--            <textarea class="form-control" id="filter-description" name="description" placeholder="Description">{{ $filter->description }}</textarea>--}}
{{--        </div>--}}
{{--        <div class="form-group">--}}
{{--            <label for="filter-type">Type</label>--}}
{{--            <select class="form-control" id="filter-type" name="type">--}}
{{--                <option value="">Select a type</option>--}}
{{--                @foreach($filterTypes as $filterType)--}}
{{--                    <option value="{{ $filterType->id }}" {{ $filter->type_id == $filterType->id ? 'selected' : '' }}>{{ $filterType->name }}</option>--}}
{{--                @endforeach--}}
{{--            </select>--}}
{{--        </div>--}}
{{--        <div class="form-group">--}}
{{--            <label for="filter-value">Value</label>--}}
{{--            <input type="text" class="form-control" id="filter-value" name="value" placeholder="Value" value="{{ $filter->value }}">--}}
{{--        </div>--}}
{{--        <div class="form-group">--}}
{{--            <label for="filter-value">Value 2</label>--}}
{{--            <input type="text" class="form-control" id="filter-value2" name="value2" placeholder="Value 2" value="{{ $filter->value2 }}">--}}
{{--        </div>--}}
{{--        <div class="form-group">--}}
{{--            <label for="filter-value">Value 3</label>--}}
{{--            <input type="text" class="form-control" id="filter-value3" name="value3" placeholder="Value 3" value="{{ $filter->value3 }}">--}}
{{--        </div>--}}
{{--        <div class="form-group">--}}
{{--            <label for="filter-value--}}
{{--            ">Value 4</label>--}}
{{--            <input type="text" class="form-control" id="filter-value4" name="value4" placeholder="Value 4" value="{{ $filter->value4 }}">--}}
{{--        </div>--}}
{{--    </div>--}}
</div>
