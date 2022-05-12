@extends('layouts.default')
@section('contentss')


    <form>
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">

                    @if(session('thongbao'))
                        <div class="alert alert-danger">
                            {{session('thongbao')}}
                        </div>
                    @endif
                    @if(Session::has('success'))
                        <div class="alert alert-success">
                            {{Session::get('ssuccess')}}
                        </div>

                    @endif


                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                        <tr align="center">
                            <th>STT</th>
                            <th>email</th>
                            <th>name</th>
                            <th>địa chỉ</th>
                            <th>phone</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i = 0; $skipped =  $list->firstItem(); ?>


                        @foreach($list as $l)
                            <tr >
                                <td> {{ $skipped + $i }}
                                    <?php $i++; ?></td>
                                <td>{{$l->mail_address}}</td>
                                <td >{{$l->name}}}}</td>
                                <td >{{$l->address}}</td>
                                <td>{{$l->phone}}</td>

                            </tr>
                        @endforeach
                        </tbody>

                    </table>
                    {!! $list->links() !!}
                </div>

            </div>

        </div>
    </form>



    </body>

@endsection


