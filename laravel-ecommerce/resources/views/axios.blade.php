@extends('layout.app')

@push('scripts')
<script>
document.addEventListener("DOMContentLoaded", function(){
    window.axios.get("{{ route('axios', ['test']) }}?valami=2")
    .then(response => {
        console.log(response.data);
    })
    .catch(error => {
        console.error(error);
    });
});   
</script>
@endpush