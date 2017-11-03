//Хочу выразить благодарность Laracast
//<3

class Crud {

  constructor(data) {
        this.originalData = data;

        for (let field in data) {
            this[field] = data[field];
        }

    }


    data() {
        let data = {};

        for (let property in this.originalData) {
            data[property] = this[property];
        }

        return data;
    }


    post(url) {
        return this.submit('post', url);
    }


    put(url) {
        return this.submit('put', url);
    }


    patch(url) {
        return this.submit('patch', url);
    }

    delete(url) {
        return this.submit('delete', url);
    }


    submit(requestType, url) {
        return new Promise((resolve, reject) => {
            axios[requestType](url, this.data())
                .then(response => resolve(response.data))
                .catch(error => console.log(error.message));
        });
    }

}

export default Crud;
