<table border="1px" class="table table-hover">
<tr>
<th>Report Number</th>
<th>User Name</th>
<th>actions</th>
</tr>
@foreach ($reports as $report)
<tr>
<td>
{{ $report->id }} 
</td>
<td>
{{ $report->user->name }}
</td>
<td>
<a href="reports/{{ $report->id }}"  name="view" class="btn btn-info"> view</a>
</td>
</tr>
@endforeach
</table>
</div>

