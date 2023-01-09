<?php

$vendorDir = dirname(__DIR__);

return array (
  'yiisoft/yii2-bootstrap4' => 
  array (
    'name' => 'yiisoft/yii2-bootstrap4',
    'version' => '9999999-dev',
    'alias' => 
    array (
      '@yii/bootstrap4' => $vendorDir . '/yiisoft/yii2-bootstrap4/src',
    ),
  ),
  'omnilight/yii2-scheduling' => 
  array (
    'name' => 'omnilight/yii2-scheduling',
    'version' => '9999999-dev',
    'alias' => 
    array (
      '@omnilight/scheduling' => $vendorDir . '/omnilight/yii2-scheduling/src',
    ),
    'bootstrap' => 'omnilight\\scheduling\\Bootstrap',
  ),
  'notamedia/yii2-sentry' => 
  array (
    'name' => 'notamedia/yii2-sentry',
    'version' => '1.5.0.0',
    'alias' => 
    array (
      '@notamedia/sentry' => $vendorDir . '/notamedia/yii2-sentry/src',
    ),
  ),
  'yiisoft/yii2-queue' => 
  array (
    'name' => 'yiisoft/yii2-queue',
    'version' => '9999999-dev',
    'alias' => 
    array (
      '@yii/queue' => $vendorDir . '/yiisoft/yii2-queue/src',
      '@yii/queue/amqp' => $vendorDir . '/yiisoft/yii2-queue/src/drivers/amqp',
      '@yii/queue/amqp_interop' => $vendorDir . '/yiisoft/yii2-queue/src/drivers/amqp_interop',
      '@yii/queue/beanstalk' => $vendorDir . '/yiisoft/yii2-queue/src/drivers/beanstalk',
      '@yii/queue/db' => $vendorDir . '/yiisoft/yii2-queue/src/drivers/db',
      '@yii/queue/file' => $vendorDir . '/yiisoft/yii2-queue/src/drivers/file',
      '@yii/queue/gearman' => $vendorDir . '/yiisoft/yii2-queue/src/drivers/gearman',
      '@yii/queue/redis' => $vendorDir . '/yiisoft/yii2-queue/src/drivers/redis',
      '@yii/queue/sync' => $vendorDir . '/yiisoft/yii2-queue/src/drivers/sync',
      '@yii/queue/sqs' => $vendorDir . '/yiisoft/yii2-queue/src/drivers/sqs',
      '@yii/queue/stomp' => $vendorDir . '/yiisoft/yii2-queue/src/drivers/stomp',
    ),
  ),
  'yii2mod/yii2-enum' => 
  array (
    'name' => 'yii2mod/yii2-enum',
    'version' => '9999999-dev',
    'alias' => 
    array (
      '@yii2mod/enum' => $vendorDir . '/yii2mod/yii2-enum',
    ),
  ),
  'yiisoft/yii2-swiftmailer' => 
  array (
    'name' => 'yiisoft/yii2-swiftmailer',
    'version' => '9999999-dev',
    'alias' => 
    array (
      '@yii/swiftmailer' => $vendorDir . '/yiisoft/yii2-swiftmailer/src',
    ),
  ),
  'yii2mod/yii2-user' => 
  array (
    'name' => 'yii2mod/yii2-user',
    'version' => '9999999-dev',
    'alias' => 
    array (
      '@yii2mod/user' => $vendorDir . '/yii2mod/yii2-user',
    ),
  ),
  'yiisoft/yii2-jui' => 
  array (
    'name' => 'yiisoft/yii2-jui',
    'version' => '9999999-dev',
    'alias' => 
    array (
      '@yii/jui' => $vendorDir . '/yiisoft/yii2-jui/src',
    ),
  ),
  '2amigos/yii2-arrayquery-component' => 
  array (
    'name' => '2amigos/yii2-arrayquery-component',
    'version' => '9999999-dev',
    'alias' => 
    array (
      '@dosamigos/arrayquery' => $vendorDir . '/2amigos/yii2-arrayquery-component/src',
    ),
  ),
  'yii2mod/yii2-rbac' => 
  array (
    'name' => 'yii2mod/yii2-rbac',
    'version' => '9999999-dev',
    'alias' => 
    array (
      '@yii2mod/rbac' => $vendorDir . '/yii2mod/yii2-rbac',
    ),
  ),
  'rmrevin/yii2-fontawesome' => 
  array (
    'name' => 'rmrevin/yii2-fontawesome',
    'version' => '2.10.3.0',
    'alias' => 
    array (
      '@rmrevin/yii/fontawesome' => $vendorDir . '/rmrevin/yii2-fontawesome',
    ),
  ),
  'yiisoft/yii2-debug' => 
  array (
    'name' => 'yiisoft/yii2-debug',
    'version' => '2.1.13.0',
    'alias' => 
    array (
      '@yii/debug' => $vendorDir . '/yiisoft/yii2-debug/src',
    ),
  ),
  'yiisoft/yii2-gii' => 
  array (
    'name' => 'yiisoft/yii2-gii',
    'version' => '2.1.4.0',
    'alias' => 
    array (
      '@yii/gii' => $vendorDir . '/yiisoft/yii2-gii/src',
    ),
  ),
  'yiisoft/yii2-faker' => 
  array (
    'name' => 'yiisoft/yii2-faker',
    'version' => '9999999-dev',
    'alias' => 
    array (
      '@yii/faker' => $vendorDir . '/yiisoft/yii2-faker/src',
    ),
  ),
  'insolita/yii2-migration-generator' => 
  array (
    'name' => 'insolita/yii2-migration-generator',
    'version' => '3.2.0.0',
    'alias' => 
    array (
      '@insolita/migrik' => $vendorDir . '/insolita/yii2-migration-generator',
    ),
    'bootstrap' => 'insolita\\migrik\\Bootstrap',
  ),
);
