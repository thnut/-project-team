/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once ('./Connections/project.php');
function loadstation(){
    $.ajax({
            dataType: "json",
            ural: ajaxURL,
            data: 'action=loadstaion',
            success: function(return_data){
                $('').html(parseHtml(tplsation,return_data));
                
            }
        }
    );
}

loadstation();