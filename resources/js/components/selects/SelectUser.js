export default ({ api, old }) => ({
    open: false,

    label: '',
    value: null,
    photo: null,

    users: [],
    showing: 0,
    search: '',
    loading: true,

    async init() {
        this.users = await (await fetch(api)).json();
        this.loading = false;

        if(old !== 'null' && old !== '') {
            const tmp = this.items.filter(i => i.id == old);

            this.value = tmp[0].id;
            this.label = tmp[0].name;
            this.photo = 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80';
        }
    },

    toggle() {
        this.open = !this.open;
    },

    selectItem(value, label = value) {
        this.value = value;
        this.label = label;
        this.photo = 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80';

        this.open = false;
    },

    get filteredItems() {
        const tmp = this.users.filter(i => i.name.toLowerCase().startsWith(this.search.toLowerCase()));
        this.showing = tmp.length;

        return tmp;
    }
})
