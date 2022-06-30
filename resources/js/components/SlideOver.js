export default (initialState = false, id = 'null') => ({
    open: initialState,
    id: id.toLowerCase(),

    toggle() {
        this.open = ! this.open
    },

    toggleOutside(detail) {
        if(detail.toLowerCase() === this.id) {
            this.toggle()
        }
    }
})
