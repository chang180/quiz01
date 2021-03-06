@extends("layouts.layout")

@section('main')
    @include("layouts.backend_sidebar")

    <div class="main col-9 p-0 d-flex flex-wrap align-items-start">
        <div class="col-8 border py-3 text-center">後台管理區</div>
        <a href="/logout" class="col-4 btn btn-danger border py-3 text-center">管理登出</a>
        <div class="border w-100 p-1" style="height:500px;overflow:auto">
            <h5 class="text-center border-bottom py-3">
                @if ($module != 'Total' && $module != 'Bottom')
                    <button class="btn btn-sm btn-primary float-left" id="addRow">新增</button>
                @endif
                {{ $header }}
            </h5>
            <table class="table border-none text-center">
                <tr>
                    {{-- <td>網站標題</td>
                    <td>替代文字</td>
                    <td width="10%">顯示</td>
                    <td width="10%">刪除</td>
                    <td width="10%">操作</td> --}}
                    {{-- 神奇的部份 --}}
                    @isset($cols)
                        @if ($module != 'Total' && $module != 'Bottom')
                            @foreach ($cols as $col)
                                <td width="{{ $col }}">{{ $col }}</td>
                            @endforeach
                        @endif
                    @endisset

                </tr>
                @isset($rows)
                    @if ($module != 'Total' && $module != 'Bottom')
                        @foreach ($rows as $row)
                            {{-- <tr>
                                <td><img src="{{ asset('storage/' . $row->img) }}" style="width:300px;height:30px;"></td>
                                <td>{{ $row->text }}</td>
                                <td><button class="btn btn-success btn-sm show" data-id={{ $row->id }}>
                                        @if ($row->sh == 1) 顯示
                                            @else 隱藏
                                        @endif
                                    </button></td>
                                <td><button class="btn btn-danger btn-sm delete" data-id={{ $row->id }}>刪除</button></td>
                                <td><button class="btn btn-info btn-sm edit" data-id={{ $row->id }}>編輯</button></td>
                            </tr> --}}
                            {{-- 更神奇的部份 --}}
                            <tr>
                                @foreach ($row as $item)
                                    <td>
                                        @switch($item['tag'])
                                            @case('img')
                                            @include('layouts.img',$item)
                                            @break
                                            @case('button')
                                            @include('layouts.button',$item)
                                            @break
                                            @case('embed')
                                            @include('layouts.embed',$item)
                                            @break
                                            @case('textarea')
                                            @include('layouts.textarea',$item)
                                            @break
                                            @default
                                            {!! nl2br($item['text']) !!}
                                        @endswitch
                                    </td>
                                @endforeach
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td> {{ $cols[0] }} </td>
                            <td> {{ $rows[0]['text'] }} </td>
                            <td> @include("layouts.button",$rows[1]) </td>
                        </tr>
                    @endif
                @endisset
            </table>
            @isset($all)
                <td>
                    {{ $all->links() }}
                </td>
            @endisset
{{-- @switch($module)
@case('Image')
@case('News')
{{ $paginate }}
@break
@endswitch --}}
        </div>
    </div>
@endsection

@section('script')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#addRow').on("click", function() {
                @isset($menu_id)
                    $.get("/modals/add{{ $module }}/{{ $menu_id }}", function(modal) {
                        $("#modal").html(modal)
                        $("#baseModal").modal("show")

                        $("#baseModal").on("hidden.bs.modal", function() {

                            $("#baseModal").modal("dispose")
                            $("#modal").html("")
                        })
                    })

                @else
                    $.get("/modals/add{{ $module }}", function(modal) {
                        $("#modal").html(modal)
                        $("#baseModal").modal("show")

                        $("#baseModal").on("hidden.bs.modal", function() {
                            $("#baseModal").modal("dispose")
                            $("#modal").html("")
                        })
                    })
                    @endif
                }) 

            $(".edit").on("click", function() {
                let id = $(this).data('id');
                $.get(`/modals/{{ strtolower($module) }}/${id}`, function(modal) {
                    $("#modal").html(modal)
                    $("#baseModal").modal("show")

                    $("#baseModal").on("hidden.bs.modal", function() {
                        $("#baseModal").modal("dispose")
                        $("#modal").html("")
                    })
                })
            })

            $(".delete").on('click', function() {
                let id = $(this).data('id')
                let _this = $(this)
                $.ajax({
                    type: 'delete',
                    url: `/admin/{{ strtolower($module) }}/${id}`,
                    success: function() {
                        _this.parents("tr").remove()

                    }
                })
            })

            $(".show").on('click', function() {
                let id = $(this).data('id')
                let _this = $(this)
                $.ajax({
                    type: 'patch',
                    url: `/admin/{{ strtolower($module) }}/sh/${id}`,

                    @if($module=="Title")
                    success: function(img) {

                        if (_this.text == '顯示') {
                            $(".show").each((idx,dom)=>{
                                if($(dom).text()=='隱藏'){
                                    $(dom).text("顯示")
                                    return flase
                                }
                            })
                            _this.text('隱藏')
                        } else {
                            $(".show").text("隱藏")
                            _this.text('顯示')
                        }

                        $(".header img").attr("src","http://quiz01.com/storage" + img)
                    }

                    @else
                    success: function() {
                        if (_this.text == '顯示') {
                            _this.text('隱藏')
                        } else {
                            _this.text('顯示')
                        }
                    }

                    @endif
                })
            })

            $(".sub").on('click', function() {
                let id = $(this).data('id')
                location.href = `/admin/submenu/${id}`
            })

        </script>
    @endsection
