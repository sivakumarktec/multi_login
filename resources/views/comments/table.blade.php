

@if (count($comments) > 0)
    <div class="panel panel-default">
        <div class="panel-heading">
            Comments List
        </div>

        <div class="panel-body">
            <table class="table table-striped task-table">

                <!-- Table Headings -->
                <thead>
                    <th>Comments</th>
                    <th>Created By</th>
                    <th>Created At</th>
                </thead>

                <!-- Table Body -->
                <tbody>
                    @foreach($comments as $comment)
                        <tr>
                            <!-- Task Name -->
                            <td class="table-text">
                                <div>{{$comment->comments}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$comment->created_by}} - {{($comment->is_admin_created) ? 'Admin' : 'Customer'}}</div>
                            </td>

                            <td>
                                <div>{{isset($comment->created_at) ? date('d-m-Y', strtotime($comment->created_at)) : ''}}</div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endif