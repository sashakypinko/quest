Nova.$on('resource-loaded', function () {
    Nova.$toasted.show('It worked!', { type: 'success' })
});
