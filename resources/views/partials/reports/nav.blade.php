<nav class="col-sm-3 col-md-2 d-none d-sm-block bg-light sidebar">
    <ul class="nav nav-pills flex-column">
        <li class="nav-item">
            {!! Form::open(['route' => 'reports.show.post', 'method' => 'post']) !!}
                <select name="id" class="form-control">
                    <label>Select User</label>

                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->username }}</option>
                    @endforeach

                </select>
                <small>Select User to Search Messages of that user only</small>
                <button class="btn btn-primary" type="submit">Search</button>
            </form>
        </li>
    </ul>

</nav>
