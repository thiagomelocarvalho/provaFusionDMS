$(function(){
    $('#dg').datagrid({
        view: detailview,
        detailFormatter:function(index,row){
            return '<div><table id="ddv-' + index + '"></table></div>';
        },
        onExpandRow: function(index,row){
            $('#ddv-'+index).datagrid({
                url:'php/crud/veiculo_aluguel/getDetail_veiculo_aluguel.php?id='+row.id,
                fitColumns:true,
                singleSelect:true,
                rownumbers:true,
                loadMsg:'',
                height:'auto',
                columns:[[
                    {field:'nome_veiculo',title:'Veículo',width:100},
                    {field:'placa',title:'Placa',width:50,align:'right'},
                    {field:'marca',title:'Marca',width:60,align:'right'} ,
                    {field:'modelo',title:'Modelo',width:60,align:'right'},
                    {field:'ano_modelo',title:'Ano',width:40,align:'right'},
                    {field:'km_atual',title:'KM Atual',width:40,align:'right'},
                    {field:'data_hora_inicio',title:'Data Início',width:100,align:'right'},
                    {field:'data_hora_fim',title:'Data fim',width:100,align:'right'}
                ]],
                onResize:function(){
                    $('#dg').datagrid('fixDetailRowHeight',index);
                },
                onLoadSuccess:function(){
                    setTimeout(function(){
                        $('#dg').datagrid('fixDetailRowHeight',index);
                    },0);
                }
            });
            $('#dg').datagrid('fixDetailRowHeight',index);
        }
    });
});




var url;
function newMotorista(){
    $('#dlg').dialog('open').dialog('setTitle','Novo Motorista');
    $('#fm').form('clear');
    url = 'php/crud/motorista/save_motorista.php';
}

function newVeiculo(){
    $('#dlgV').dialog('open').dialog('setTitle','Novo Veículo');
    $('#fmV').form('clear');
    url = 'php/crud/veiculo/save_veiculo.php';
}

function newAluguel(){
    $('#dlgA').dialog('open').dialog('setTitle','Novo Aluguel');
    $('#fmA').form('clear');
    url = 'php/crud/veiculo_aluguel/save_veiculo_aluguel.php';
}

function editMotorista(){
    var row = $('#dg').datagrid('getSelected');
    if (row){
        $('#dlg').dialog('open').dialog('setTitle','Editar Motorista');
        $('#fm').form('load',row);
        url = 'php/crud/motorista/update_motorista.php?id='+row.id;
    }
}

function editVeiculo(){
    var row = $('#dgV').datagrid('getSelected');
    if (row){
        $('#dlgV').dialog('open').dialog('setTitle','Editar Veículo');
        $('#fmV').form('load',row);
        url = 'php/crud/veiculo/update_veiculo.php?id='+row.id;
    }
}

function editAluguel(){
    var row = $('#dgA').datagrid('getSelected');
    if (row){
        $('#dlgA').dialog('open').dialog('setTitle','Editar Aluguel');
        $('#fmA').form('load',row);
        url = 'php/crud/veiculo_aluguel/update_veiculo_aluguel.php?id='+row.id;
    }
}

function saveMotorista(){
    $('#fm').form('submit',{
        url: url,
        onSubmit: function(){
            return $(this).form('validate');
        },
        success: function(result){
            var result = eval('('+result+')');
            if (result.errorMsg){
                $.messager.show({
                    title: 'Error',
                    msg: result.errorMsg
                });
            } else {
                $('#dlg').dialog('close');
                $('#dg').datagrid('reload');
                $('#motorista_id').combobox('reload');
                $('#veiculo_id').combobox('reload');
            }
        }
    });
}

function saveVeiculo(){
    $('#fmV').form('submit',{
        url: url,
        onSubmit: function(){
            return $(this).form('validate');
        },
        success: function(result){
            var result = eval('('+result+')');
            if (result.errorMsg){
                $.messager.show({
                    title: 'Error',
                    msg: result.errorMsg
                });
            } else {
                $('#dlgV').dialog('close');
                $('#dgV').datagrid('reload');
                $('#motorista_id').combobox('reload');
                $('#veiculo_id').combobox('reload');
            }
        }
    });
}

function saveAluguel(){
    $('#fmA').form('submit',{
        url: url,
        onSubmit: function(){
            return $(this).form('validate');
        },
        success: function(result){
            var result = eval('('+result+')');
            console.log(result);
            if (result.errorMsg){
                $.messager.show({
                    title: 'Error: ' + result.errorMsg,
                    msg: result.errorMsg
                });
            } else {
                $('#dlgA').dialog('close');
                $('#dgA').datagrid('reload');
            }
        }
    });
}

function destroyMotorista(){
    var row = $('#dg').datagrid('getSelected');
    if (row){
        $.messager.confirm('Confirmação','Você tem certeza que deseja excluir o motorista?',function(r){
            if (r){
                $.post('php/crud/motorista/destroy_motorista.php',{id:row.id},function(result){
                    if (result.success){
                        $('#dg').datagrid('reload');
                    } else {
                        $.messager.show({
                            title: 'Error',
                            msg: result.errorMsg
                        });
                    }
                },'json');
            }
        });
    }
}
function getMotorista(){
    $('#dg').datagrid('load',{
        nomePesquisa: $('#nomePesquisa').val(),
        cnhPesquisa: $('#cnhPesquisa').val()
    });
}
function refreshGridMotorista(){
    $('#nomePesquisa').val('');
    $('#cnhPesquisa').val('');

    $('#dg').datagrid('load',{
        nomePesquisa: '',
        cnhPesquisa: ''
    });
}
function minhaFormatacao(date){
    var y = date.getFullYear();
    var m = date.getMonth()+1;
    var d = date.getDate();
    return y+'-'+(m<10?('0'+m):m)+'-'+(d<10?('0'+d):d);
}

function formataData(s){
    if (!s) return new Date();
    var ss = (s.split('-'));
    var y = parseInt(ss[0],10);
    var m = parseInt(ss[1],10);
    var d = parseInt(ss[2],10);
    if (!isNaN(y) && !isNaN(m) && !isNaN(d)){
        return new Date(y,m-1,d);
    } else {
        return new Date();
    }
}
