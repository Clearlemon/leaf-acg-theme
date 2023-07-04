<?php
// Control core classes for avoid errors
if( class_exists( 'CSF' ) ) {

  //
  // Create a widget 1
  //
  CSF::createWidget( 'csf_widget_example_1', array(
    'title'       => 'Codestar Widget Example 1',
    'classname'   => 'csf-widget-classname',
    'description' => 'A description for widget example 1',
    'fields'      => array(

      array(
        'id'      => 'title',
        'type'    => 'text',
        'title'   => 'Title',
      ),

      array(
        'id'      => 'opt-text',
        'type'    => 'text',
        'title'   => 'Text',
        'default' => 'Default text value',
      ),

      array(
        'id'      => 'opt-switcher',
        'type'    => 'switcher',
        'title'   => 'Switcher',
      ),

      array(
        'id'      => 'opt-textarea',
        'type'    => 'textarea',
        'title'   => 'Textarea',
        'help'    => 'The help text of the field.',
      ),

    )
  ) );

  //
  // Front-end display of widget example 1
  // Attention: This function named considering above widget base id.
  //
  if( ! function_exists( 'csf_widget_example_1' ) ) {
    function csf_widget_example_1( $args, $instance ) {

      echo $args['before_widget'];

      if ( ! empty( $instance['title'] ) ) {
        echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
      }

      // var_dump( $args ); // Widget arguments
      // var_dump( $instance ); // Saved values from database
      echo $instance['title'];
      echo $instance['opt-text'];
      echo $instance['opt-switcher'];
      echo $instance['opt-textarea'];

      echo $args['after_widget'];

    }
  }

}
