/**
 * Created by albert on 31/05/17.
 */
(function () {

    angular.module('myApp')
        .service("dialogProvider", dialogProvider);

    function dialogProvider() {


        return {
            showDialog: showDialog,
            showDialogFromText: showDialogFromText
        };

        function showDialog(response) {
            var m = response.data[Object.keys(response.data)[0]];
            BootstrapDialog.show({
                message: m
            });
        }

        function showDialogFromText(m) {
            BootstrapDialog.show({
                message: m
            });
        }


    }

})();
