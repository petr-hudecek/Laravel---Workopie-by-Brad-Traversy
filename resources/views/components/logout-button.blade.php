<form action="{{route('logout')}}" method="POST">
    @csrf
    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white px-4 py-2 rounded hover:shadow-md transition duration-300 cursor-pointer">
        <i class="fa fa-sign-out"></i> Logout
    </button>
</form>