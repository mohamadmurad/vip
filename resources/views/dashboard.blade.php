<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('الصفحة الرئيسية') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-2">

                <form method="get" action="{{route('info')}}">
                    @csrf
                    <div class="form-group">
                        <label >باركود البطاقة </label>
                        <input type="text" class="form-control" class="" name="barcode" autofocus placeholder="الرجاء كتابة رقم الباركود">
                        <small  class="form-text text-muted">قم بمسح باركود البطاقة او قم بكتابته يدوياً</small>
                        <div class="row"></div>
                        <ul class="errors">
                            @foreach ($errors->get('barcode') as $message)
                                <i style="margin-right: 50px;">{{ $message }}</i>
                            @endforeach
                        </ul>
                    </div>


                    <button type="submit" class="btn btn-primary">بحث</button>

                </form>

            </div>
        </div>
    </div>
</x-app-layout>
