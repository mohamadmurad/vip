<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 float-right">
            {{ __('إضافة كروت ' ) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-2">




                <div style="clear: both;"></div>
                <form method="post" action="{{route('addCard')}}" id="withdrawForm">
                    @csrf
                    <div class="form-group">
                        <label >الرقم الاول في سلسلة البطاقات</label>
                        <input type="number" class="form-control" name="firstBarcode" placeholder="الرقم الاول من السلسلة" required min="1"
                               autofocus>
                        <small  class="form-text text-muted">يجب ان لا تكون القيمة سالبة او صفر</small>
                        <ul class="errors">
                            @foreach ($errors->get('firstBarcode') as $message)
                                <i>{{ $message }}</i>
                            @endforeach
                        </ul>
                    </div>
                    <div style="clear: both;"></div>
                    <div class="form-group">
                        <label >الرقم الأخير في سلسلة البطاقات</label>
                        <input type="number" class="form-control" name="lastBarcode" placeholder="الرقم الأخير للبطاقات" required min="1"
                               autofocus>

                        <small  class="form-text text-muted">يجب ان لا تكون القيمة سالبة او صفر</small>
                        <ul class="errors">
                            @foreach ($errors->get('lastBarcode') as $message)
                                <i>{{ $message }}</i>
                            @endforeach
                        </ul>
                    </div>

                    <div style="clear: both;"></div>
                    <div class="form-group">
                        <label >الرصيد لهذه البطاقات</label>
                        <input type="number" class="form-control" name="balance" placeholder="ادخل قيمة رصيد البطاقات" required min="0"
                               autofocus>
                        <small  class="form-text text-muted">يجب ان لا تكون القيمة سالبة </small>
                        <ul class="errors">
                            @foreach ($errors->get('balance') as $message)
                                <i>{{ $message }}</i>
                            @endforeach
                        </ul>
                    </div>

                    <button type="submit" class="btn btn-primary">إضافة</button>

                </form>




            </div>
        </div>
    </div>


</x-app-layout>
