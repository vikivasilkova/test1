<?php

/**
 * Created by PhpStorm.
 * User: Emil
 * Date: 12/13/13
 * Time: 9:22 AM
 */
class CheckProductFilter extends CFilter {

	protected function preFilter($filterChain) {

		if (Yii::app()->user->isGuest) {

			$result = new Result();
			$result->success = false;
			$result->object = 'Cart';
			$result->method = 'showLogIn';
			$result->params = array(
				$filterChain->controller->productID,
				$filterChain->controller->quantity,
				true,
			);

			$result->toJson();

		} else {
			$filterChain->run();
		}
	}

	protected function postFilter($filterChain) {
		// logic being applied after the action is executed
		return true;
	}

}