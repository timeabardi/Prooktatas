<script>
import axios from 'axios';

axios.get('/axios?variable=test')
.then(response => {
    console.log(response.data);
})
.catch(error => {
    console.error(error);
});
</script>