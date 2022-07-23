export default ({ api }) => ({

    items: [],

    async init() {
        this.items = await (await fetch(api)).json();
        console.log(this.items);
    },
})
