@extends('layouts.journal')

@section('head')
    @parent
@endsection

@section('header')
    @parent
@endsection

@section('content')
    @parent
    @section('yesterday')

        <form method="get">
        <h1>Записи журнала за:</h1> <input type="date" id="date_search" name="date_search" value="{{$date_search}}" onchange="this.form.submit()">
        </form>
        <form method="post">
        {{ csrf_field() }}
        
        @if(!empty($objEntrys))
            <table id="list_old_text" border="1" >
                <tr>
                    <td><b>Содержание</b></td>
                    <td><b>Отметка</b></td>
                    <td>Удалить</td>
                </tr>
                
                @foreach ($objEntrys as $row) 
                    <tr>
                        <td>
                            {{$row->getText()}} 
                        </td>
                        <td>
                            <select id="select_{{$row->getId()}}"  name="select_{{$row->getId()}}">
                                @if ($row->getMark()==null || empty($row->getMark())) 
                                        <option value="0">0</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                @else
                                        <option value="{{$row->getMark()}}">{{$row->getMark()}}</option>
                                @endif
                            </select>
                        </td>
                        <td>
                            <input type="checkbox" id="delold_{{$row->getId()}}" name="delold_{{$row->getId()}}">
                        </td>
                    </tr>
                @endforeach
            </table>
        @endif
        
        </br>
        <button id="save_mark" name="save_mark" value=1>Сохранить отметки</button>
        </form>
    @endsection
    @section('today')
        <h1>Новые задания:</h1>
        {{--<ol id="list_new_entry">--}}
        @if (!empty($arrEntrys)) 
            <table id="list_new_entry" border="1" >
                <tr>
                    <td><b>№</b></td>
                    <td><b>Содержание</b></td>
                    <td><b>Удалить</b></td>
                </tr>
                @foreach ($arrText as $i=>$text) 
                    <tr>
                        <td>{{$i+1}}</td>
                        <td><p id="new_entry_{{$i+1}}" name="new_entry_{{$i+1}}">{{$text}}</p></td>
                        <td><input type="checkbox" id="delnew_{{$i+1}}" name="delnew_{{$i+1}}"></td>
                    </tr>
                {{--<li id="new_entry_$i+1" name="new_entry_$i+1"> <p>$text <input type="checkbox" id="delnew_$i+1" name="delnew_$i+1"></p></li> --}}
                @endforeach
            </table>
        @endif
        {{--</ol>--}}
        </br>
        <button id="add_text" name="add_text">Добавить</button>
        <button id="dell_text" name="dell_text" v-on:click="dellText">Удалить</button>
        <form method="post">
        {{ csrf_field() }}
        <ol id="list_new_text">
        <li><textarea rows="5" cols="45" id="text_1" name="text_1"></textarea></li>
        </ol>
        <button id="save_text" name="save_text" value=1>Сохранить записи</button>
        </form>
    @endsection
    @section('plans')
        <h1>Планы:</h1>
        <form method="post">
            {{ csrf_field() }}
            
            <textarea rows="10" cols="220" name="plans_" id="plans_">
                {{ $strPlans }}
            </textarea>
            <button id="save_plans" name="save_plans" value=1>Сохранить планы</button>
        </forms>
    @endsection
@endsection

@section('footer')
    @parent
@endsection

