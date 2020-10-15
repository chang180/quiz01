  <!-- Modal -->
  <form action="{{ $action }}" method="post" enctype="multipart/form-data">
      @csrf
@isset($method)
@method($method)
@endisset

      <div class="modal fade" id="baseModal" tabindex="-1" role="dialog" aria-labelledby="ModalCenter"
          aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="ModalCenter">{{ $modal_header }}</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body">
                      <table class="m-auto">
                          {{-- <tr>
                              <td>標題區圖片</td>
                              <td> @include('layouts.input',['type'=>'file','name'=>'img']) </td>
                          </tr>
                          <tr>
                              <td>標題區替代文享</td>
                              <td><input type="text" name="text" id=""> </td>
                          </tr> --}}

                          @isset($modal_body)
                              @foreach ($modal_body as $row)
                                  <tr>
                                      <td class='text-right'>{{ $row['label'] }}</td>
                                      <td>
                                          @switch($row['tag'])
                                              @case('input')
                                              @include('layouts.input',$row)
                                              @break
                                              @case('textarea')
                                              @break
                                              @case('img')
                                              @include('layouts.img',$row)
                                              @break

                                          @endswitch
                                      </td>
                                  </tr>
                              @endforeach
                          @endisset
                      </table>
                  </div>
                  <div class="modal-footer">
                      <button type="reset" class="btn btn-secondary">重置</button>
                      <button class="btn btn-primary">儲存</button>
                  </div>
              </div>
          </div>
      </div>
  </form>
