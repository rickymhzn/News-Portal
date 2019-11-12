@extends('admin.layout.master')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">{{ $page_name }}</strong>
                </div>
                <div class="card-body">
                    <!-- Credit Card -->
                    <div id="pay-invoice">
                        <div class="card-body">
                            @if(count($errors) > 0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach($errors->all() as $error )
                                            <li>
                                                {{ $error }}
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <hr>
                            @endif
                            {{ Form::open(array('url' => 'back/comment/reply','method'=>'post')) }}

                            <div class="form-group">
                                {{ Form::label('comment','Comment', array('class' =>'control-label mb-1')) }}
                                {{ Form::textarea('comment', null , array('class' =>'form-control','id'=>'comment')) }}
                            </div>
                                {{ Form::hidden('post_id', $id) }}

                                <div>
                                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                    <i class="fa fa-lock fa-lg"></i>&nbsp;
                                    <span id="payment-button-amount">Submit</span>
                                    <span id="payment-button-sending" style="display:none;">Sending…</span>
                                </button>
                            </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div> <!-- .card -->
        </div>
    </div>

@endsection