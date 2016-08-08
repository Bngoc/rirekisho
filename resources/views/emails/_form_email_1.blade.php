<div class="danger"></div>
<div class="panel">
    <div class="panel panel-heading">
        {{$status->status}}
    </div>
    <div class="panel panel-body">
        <form method="post" action="{{ url('emails/sendEmail1') }}" enctype="multipart/form-data">
            <div class="form-group">
                <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                <input type="hidden" name="id" value="{{$id}}"/>
                <input type="hidden" name="type" value="{{$type}}"/>
                <div class="form-group">
                    <label for="recipient" class="label label-default">Recipient: </label>
                    <input name="recipient" class="form-control " type="email"
                           placeholder="Recipient's email address" value="{{ $email }}"/>
                </div>

                <div class="form-group">
                    <label for="sender" class="label label-default">Sender: </label>
                    <input name="sender" class="form-control" placeholder="Sender's name"/>
                </div>

                <div class="form-group">
                    <label for="subject" class="label label-default">Subject: </label>
                    <input name="subject" class="form-control" placeholder="Subject"/>
                </div>
                @if(count($status->info))
                <hr>
                Xin hen ban<br>
                @endif
                @if(in_array('Date',$status->info))
                <div class="form-group">
                    <label for="date" class="label label-default">Ngay: </label>
                    <input type="date" class="form-control" name="date" id="date"
                           data-date='{"startView": 2, "openOnMouseFocus": true}'/>
                </div>
                @endif
                @if(in_array('Time',$status->info))
                <div class="form-group">
                    <label for="time" class="label label-default">Vao luc: </label>
                    <input type="time" class="form-control" name="time" id="time"/>
                </div>
                @endif
                @if(in_array('Address',$status->info))
                <div class="form-group">
                    <label for="address" class="label label-default">Tai: </label>
                    <input class="form-control" name="address"
                           value="Tầng 8 tòa nhà CTM Số 139 Cầu giấy, phường Quan Hoa, quận Cầu Giấy, Hà Nội."/>
                </div>
                @endif
                @if(in_array('Attach',$status->info))
                <div class="form-group">
                    <label for="attach" class="label label-default">Attach: </label>
                    <input name="attach[]" class="form-control" type="file" multiple=""/>
                </div>
                @endif
            </div>
            <button class="btn btn-primary col-lg-12" name="sendMail">Send mail</button>
        </form>
    </div>
</div>