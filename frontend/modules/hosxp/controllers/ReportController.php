<?php

namespace frontend\modules\hosxp\controllers;

use yii\web\Controller;
use yii;
use yii\data\ArrayDataProvider;


class ReportController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionReport1()
    {
        
        $connection = Yii::$app->db2;
        $data = $connection->createCommand("SELECT  c.clinic,c.`name` cname, COUNT(cm.hn) total,cm.refer_register_from_hospcode
            from clinicmember cm
            JOIN clinic c on c.clinic=cm.clinic
            WHERE cm.refer_register_from_hospcode='11049'
            AND c.hospcode='11049'
            GROUP BY c.clinic
            order by total desc")->queryAll();
        
        
        for ($i = 0; $i < sizeof($data); $i++) {
            $cname[] = $data[$i]['cname'];        
            $total[] = $data[$i]['total']*1;             
        }
        
        $dataProvider = new ArrayDataProvider([
                'allModels'=>$data, 
            ]);
        
        return $this->render('report1',[
            'dataProvider'=>$dataProvider,  
            //'clinic'=>$clinic,
            'cname'=>$cname,
            'total'=>$total
            
        ]);
    }
}

