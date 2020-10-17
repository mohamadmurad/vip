<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 float-right">
            {{ __('ادارة المستخدمين') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-2">

                @include('layout.title',[
   'url' => 'users.create',
   'urlTitle' => 'انشاء مستخدم جديد',
   'title'=>'إدارة المستخدمين'
   ])
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif


                    <table class="table table-bordered">
                        <tr>
                            <th>No</th>
                            <th>الاسم</th>
                            <th>اسم المستخدم</th>
                            <th>الصلاحيات</th>

                            <th width="280px">خيارات</th>
                        </tr>
                        <?php $i = 0?>
                        @foreach ($users as $user)
                            <tr>

                                <td>{{ ++$i }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->username }}</td>
                                <td>{{ $user->isAdmin == 0 ? 'مستخدم' : 'مدير' }}</td>

                                <td>
                                    <form action="{{ route('users.destroy',$user->id) }}" method="POST">

                                        {{--                        <a class="btn btn-info" href="{{ route('color.show',$color->id) }}">Show</a>--}}

                                        <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">تعديل</a>

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-danger">حذف</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                    <div class="d-flex justify-content-center">
                        {!! $users->links() !!}
                    </div>




            </div>
        </div>
    </div>


</x-app-layout>
