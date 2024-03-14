import axios from 'axios';

export default function (to, from, next) {
    const token = localStorage.getItem('token');
    
    if (to.matched.some(record => record.meta.requiresSuperAdmin)) {
        if (token) {
        axios.get('/api/user', {
            headers: {
            'Authorization': `Bearer ${token}`,
            },
        })
        .then(response => {
            const user = response.data.user;
            if (user.is_superAdmin === 1) {
            next();
            } else {
            next({ name: 'admin.unauthorized' });
            }
        })
        .catch(error => {
            console.error('Error fetching user data:', error);
            next({ name: 'admin.unauthorized' });
        });
        } else {
        next({ name: 'dashboard' });
        }
    } else {
        next();
    }
}
