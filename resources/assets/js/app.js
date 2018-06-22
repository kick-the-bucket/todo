
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

$(function () {
    let list = () =>  {
        axios.get(route('api.todo.index')).then((response) => {
            let $list = $('#list tbody');
            $list.children('tr').remove();
            $(response.data).each((key, item) =>  {
                $list.append(
                    $('<tr>')
                        .append($('<td>').text(item.task))
                        .append($('<td>').text(item.created_at))
                        .append($('<td>').addClass('text-right').append(
                            $('<button>').addClass('btn btn-danger').text('Delete')).click(function () {
                                remove(item.id);
                            })
                        )
                );
            });
        });
    };

    let remove = (id) => {
        axios.delete(route('api.todo.destroy', id)).then(list);
    };

    let $form = $('#add');
    $form.submit(event => {
        event.preventDefault();
        axios.post(route('api.todo.store'), $form.serialize())
            .then(() => {
                $form.find('[name="task"]').val('').removeClass('is-invalid');
                list();
            })
            .catch(error => {
                // error = eval(JSON.stringify(error));
                let errors = error.response.data.errors;
                console.log(errors);
                for (name in errors) {
                    console.log('${name}: ${error.errors[name]}');
                    $('input[name="'+name+'"]').addClass('is-invalid').siblings('.invalid-feedback').text(errors[name][0]);
                }
            })
        ;
    });

    list();
});