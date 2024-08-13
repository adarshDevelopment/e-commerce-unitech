<tr>
    <th>Status</th>
    <td>
        @if($data['row']->status ==1)
            <span class="text text-success"> Active </span>
        @else
            <span class="text text-danger"> De-active </span>
        @endif
    </td>
</tr>
