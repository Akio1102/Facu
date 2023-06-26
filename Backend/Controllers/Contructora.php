<?php
require_once("../Models/Constructora.php");
header("Content-Type: application/json");
$constructora = new Constructora();

$body = json_decode(file_get_contents("php://input"), true);


switch ($_GET["op"]) {
    case 'GetAll':
        $data = $constructora->Get_Constructoras();
        echo json_encode($data);
        break;

    case 'GetId':
        $data = $constructora->Get_Constructora($_GET["id"]);
        echo json_encode($data);
        break;

    case 'Insert':
        $data = $constructora->Post_Constructora($body["nombreCons"],$body["nit"],$body["nombreRepre"],$body["email"],$body["telefono"]);
        echo json_encode($data);
        break;

    case 'Update':
        $data = $constructora->Put_Constructora($body["id"],$body["nombreCons"],$body["nit"],$body["nombreRepre"],$body["email"],$body["telefono"]);
        echo json_encode($data);
        break;
    
    case 'Delete':
        $data = $constructora->Delete_Constructora($body["id"]);
        echo json_encode($data);
        break;
    
    default:
        echo json_encode("EndPoint Invalid");
        break;
}
?>