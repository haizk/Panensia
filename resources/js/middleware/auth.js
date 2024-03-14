export default function (to, from, next) {
    const token = localStorage.getItem('token');
    
    if (to.matched.some(record => record.meta.requiresAuth)) {
        if (token) {
            next();
        } else {
            next({ name: 'dashboard' });
        }
    } else {
        next();
    }
}