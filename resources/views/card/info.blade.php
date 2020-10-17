<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 float-right">
            {{ __('البطاقة رقم ' .$card->barcode ) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-2">



                <div class="float-right" style="margin-bottom:50px;">
                    <h2>الرصيد الحالي للبطاقة : <span class="font-semibold text-gray-800">{{ $card->balance }}</span>
                    </h2>

                </div>

                <div style="clear: both;"></div>
                <form method="post" action="{{route('withdraw')}}" id="withdrawForm">
                    @csrf
                    <div class="form-group">
                        <label >ادخل قيمة الخصم من البطاقة </label>
                        <input type="number" class="form-control" name="amount" placeholder="الرجاء كتابة قيمة الخصم" required min="0"
                               max="{{$card->balance}}" autofocus>
                        <input type="hidden" class="" name="barcode" value="{{$card->barcode}}">
                        <small  class="form-text text-muted">يجب ان لا تكون القيمة اكبر من رصيد البطاقة</small>
                        <ul class="errors">
                            @foreach ($errors->get('amount') as $message)
                                <i>{{ $message }}</i>
                            @endforeach
                        </ul>
                    </div>
                    <div style="clear: both;"></div>

                    <div class="form-group">
                        <label >رقم الفاتورة :  </label>
                        <input type="text" class="form-control" name="orderNo" placeholder="الرجاء كتابة رقم الفاتورة " required
                              >
                        <small  class="form-text text-muted">قم بمسح رقم الفاتورة او كتابتها يدوياً</small>
                        <ul class="errors">
                            @foreach ($errors->get('orderNo') as $message)
                                <i>{{ $message }}</i>
                            @endforeach
                        </ul>
                    </div>
                    <button type="submit" class="btn btn-primary">خصم</button>

                </form>

                <div class="table-responsive">
                <table class="table table-bordered">
                    <tr>
                        <th>No</th>
                        <th>المستخدم</th>
                        <th>القيمة</th>
                        <th>رقم الفاتورة</th>
                        <th>التاريخ</th>

                    </tr>
                    <?php $i = 0?>
                    @foreach ($card->withdraw as $withdraw)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $withdraw->user->name }}</td>
                            <td>{{ $withdraw->amount }}</td>
                            <td>{{ $withdraw->orderNo }}</td>
                            <td>{{ $withdraw->date }}</td>

                        </tr>
                    @endforeach
                </table>
                </div>

            </div>
        </div>
    </div>


</x-app-layout>
