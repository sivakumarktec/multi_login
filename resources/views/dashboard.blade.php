@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <input type="hidden" id="baseurl" value="{{ url('/')}}">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @elseif (session('error'))
                        <div class="alert alert-error" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif

                    <div class="panel-body">

                        <!-- New Task Form -->
                        <form action="{{ route('comments.store') }}" method="POST" class="form-horizontal">
                            {!! csrf_field() !!}

                            <!-- Task Name -->
                            <input type="hidden" name="is_admin_created" value="{{ (Auth::getDefaultDriver() == 'admin') ? 1 : 0 }}">
                            <input type="hidden" name="created_by" value="{{ Auth::guard(Auth::getDefaultDriver())->user()->name }}">
                            <div class="form-group">
                                <label for="task" class="col-sm-3 control-label">Comment</label>

                                <div class="col-sm-6">
                                    <input type="text" name="comments" id="comments" required class="form-control">
                                </div>
                            </div>

                            <!-- Add Task Button -->
                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-6">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fa fa-plus"></i> Submit
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <!-- Current Tasks -->
                    <div id="comments_list">
                        
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        console.log($('#baseurl').val());
        var baseurl = $('#baseurl').val();
        $.ajax({url: baseurl+"/comments/",  
            success: function(result) { 
                $('#comments_list').append(result);            
            }
        });
    });
</script>
@endsection

