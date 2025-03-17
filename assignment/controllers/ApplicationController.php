<?php
namespace app\controllers;

use Yii;

/**
 * application controller to create/update an application
 */
class ApplicationController extends Controller
{
	/**
	 * 
	 */
    public function actionCreate()
    {

        // Check if the request is POST do this first for human readability and more efficient to not bother loading the model
        if (!Yii::$app->request->isPost) {
			Yii::$app->response->statusCode = 405; // Method Not Allowed
            return $this->asJson([
                'status' => 'error',
                'message' => 'Only POST requests are allowed.',
            ]);
		}

        // Initialize a new Post model
        $model = new Application();

		// Load the POST data into the model
		if ($model->load(Yii::$app->request->post(), '') && $model->validate()) {

			// Save the model to the database
			if ($model->save()) {
				//Send success
				Yii::$app->response->statusCode = 201; // Created status code
				return $this->asJson([
					'status' => 'success',
					'message' => 'Application created successfully!',
					'data' => $model,//is there anything in the model that we do not want to return/expose to the public?
				]);
			} else {
				//Return error otherwise
				return $this->asJson([
					'status' => 'error',
					'message' => 'Failed to create post.',
				]);
			}
		} else {
			//validation errors
			return $this->asJson([
				'status' => 'error',
				'message' => 'Validation failed.',
				'errors' => $model->errors,
			]);
		}
	}

	/**
	 * 
	 */
	public function actionUpdate($id=false)//my preferance is to default all function arguments, this results in anti-fragile code
	{

        // Check if the request is POST do this first for human readability and more efficient to not bother loading the model
        if (!Yii::$app->request->isPost) {
			Yii::$app->response->statusCode = 405; // Method Not Allowed
            return $this->asJson([
                'status' => 'error',
                'message' => 'Only POST requests are allowed.',
            ]);
		}

        // Find the existing post by ID
		if (!empty($id)) {
			$model = Application::findOne($id);
		}
        
		//error out if application doesn't exist
        if (empty($model)) {
            throw new NotFoundHttpException('The requested application is not available.');
        }

		// Load the POST data into the model
		if ($model->load(Yii::$app->request->post(), '') && $model->validate()) {
			// Save the updated model to the database
			if ($model->save()) {
				// Return success response
				return $this->asJson([
					'status' => 'success',
					'message' => 'Applications updated.',
					'data' => $model,//is there anything in the model that we do not want to return/expose to the public?
				]);
			} else {
				// Return error if save fails
				return $this->asJson([
					'status' => 'error',
					'message' => 'Error updating application.',
				]);
			}
		} else {
			// Return validation errors
			return $this->asJson([
				'status' => 'error',
				'message' => 'Validation failed.',
				'errors' => $model->errors,
			]);
		}
	}
}

