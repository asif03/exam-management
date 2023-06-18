<div class="row">
  @php $rowId = 0; @endphp
  @foreach($data['fellows'] as $fellow)
  @if($rowId%5==0)
</div>
<div class="row">
  <div class="col p-2">
    @else
    <div class="col p-2">
      @endif
      <table class="table border rounded-3">
        <tr>
          <td align="center">
            <img src="{{ asset('storage') }}/{{ $fellow->img_up_file }}" alt="Image" width="100" height="120" />
          </td>
        </tr>
        <tr>
          <td>Fellow ID: {{$fellow->fellow_id}}</td>
        </tr>
        <tr>
          <td>{{$fellow->candidate_name}}</td>
        </tr>
      </table>
    </div>
    @php $rowId = $rowId+1; @endphp
    @endforeach
  </div>