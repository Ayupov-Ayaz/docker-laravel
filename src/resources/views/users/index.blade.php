@extends('layouts.app')

@section('content')

    <!-- Bootstrap шаблон... -->

<div class="panel-body">
 <!-- Отображение ошибок проверки ввода -->
@include('common.errors')

@if(count($users) > 0)
    <div class="panel panel-default">

        <div class="panel-body">
            <table class="table">
                <thead>
                    <th>Все пользователи</th>
                    <th>&nbsp;</th>
                </thead>

                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td class="table-text">
                                {{$user->name}}
                            </td>
                            <td>
                                {{$user->email}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endif

</div>

@endsection