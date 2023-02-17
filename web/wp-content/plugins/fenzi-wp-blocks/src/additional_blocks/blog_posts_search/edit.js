/**
 * WordPress components that create the necessary UI elements for the block
 *
 * @see https://developer.wordpress.org/block-editor/packages/packages-components/
 */
import { TextControl, TextareaControl } from '@wordpress/components';

/**
 * React hook that is used to mark the block wrapper element.
 * It provides all the necessary props like the class name.
 *
 * @see https://developer.wordpress.org/block-editor/packages/packages-block-editor/#useBlockProps
 */
import { useBlockProps } from '@wordpress/block-editor';
const { registerBlockType } = wp.blocks;
const { InspectorControls, MediaUpload, MediaUploadCheck } = wp.blockEditor;
const { PanelBody, Button, ResponsiveWrapper } = wp.components;
const { Component, Fragment } = wp.element;
const { withSelect } = wp.data;
const { __ } = wp.i18n;
const { compose } = wp.compose;
import { useSelect } from '@wordpress/data';

const BlockEdit = (props) => {
	const { attributes, setAttributes } = props;
	const blockProps = useBlockProps();

	return (
		<Fragment>
			<div className="wp-block-hwd-fenzi-blog-posts-menu">
				<a className="wp-block-hwd-fenzi-blog-posts-menu-btn" href="/blog"><i className="fa fa-home"></i></a>
				<a className="wp-block-hwd-fenzi-blog-posts-menu-btn" href="/blog/categories">Categories</a>
				<a className="wp-block-hwd-fenzi-blog-posts-menu-btn" href="/blog/tags">Tags</a>
				<a className="wp-block-hwd-fenzi-blog-posts-menu-btn" href="/blog/authors">Authors</a>
				<div className="wp-block-hwd-fenzi-blog-posts-menu-search">
					<button className="wp-block-hwd-fenzi-blog-posts-menu-btn"><i className="fa fa-search"></i></button>
				</div>
			</div>

		</Fragment>
	);
};


export default compose(
	withSelect((select, props) => {
		return { };
	}))(BlockEdit);
