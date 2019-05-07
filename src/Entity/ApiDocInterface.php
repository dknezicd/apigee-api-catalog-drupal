<?php

/**
 * Copyright 2019 Google Inc.
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * version 2 as published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston,
 * MA 02110-1301, USA.
 */

namespace Drupal\apigee_api_catalog\Entity;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\EntityChangedInterface;

/**
 * Provides an interface for defining API Doc entities.
 */
interface ApiDocInterface extends ContentEntityInterface, EntityChangedInterface {

  /**
   * The value of "spec_file_source" when it uses a file as source.
   *
   * @var string
   */
  const SPEC_AS_FILE = 'file';

  /**
   * The value of "spec_file_source" when it uses a URL as source.
   *
   * @var string
   */
  const SPEC_AS_URL = 'url';

  /**
   * Gets the API Doc name.
   *
   * @return string
   *   Name of the API Doc.
   */
  public function getName() : string;

  /**
   * Sets the API Doc name.
   *
   * @param string $name
   *   The API Doc name.
   *
   * @return \Drupal\apigee_api_catalog\Entity\ApiDocInterface
   *   The called API Doc entity.
   */
  public function setName(string $name) : self;

  /**
   * Gets the description.
   *
   * @return null|string
   *   The API Doc description.
   */
  public function getDescription() : string;

  /**
   * Sets the description.
   *
   * @param string $description
   *   Description of the API Doc.
   *
   * @return \Drupal\apigee_api_catalog\Entity\ApiDocInterface
   *   The API Doc entity.
   */
  public function setDescription(string $description) : self;

  /**
   * Gets the API Doc creation timestamp.
   *
   * @return int
   *   Creation timestamp of the API Doc.
   */
  public function getCreatedTime() : int;

  /**
   * Sets the API Doc creation timestamp.
   *
   * @param int $timestamp
   *   The API Doc creation timestamp.
   *
   * @return \Drupal\apigee_api_catalog\Entity\ApiDocInterface
   *   The called API Doc entity.
   */
  public function setCreatedTime(int $timestamp) : self;

  /**
   * Returns the API Doc published status indicator.
   *
   * Unpublished API Doc are only visible to restricted users.
   *
   * @return bool
   *   TRUE if the API Doc is published.
   */
  public function isPublished() : bool;

  /**
   * Sets the published status of a API Doc.
   *
   * @param bool $published
   *   TRUE to set this API Doc to published, FALSE to set it to unpublished.
   *
   * @return \Drupal\apigee_api_catalog\Entity\ApiDocInterface
   *   The called API Doc entity.
   */
  public function setPublished(bool $published) : self;

  /**
   * Re-import OpenAPI specifications file from URL.
   *
   * @param bool $save
   *   Boolean indicating if method should save the entity.
   * @param bool $new_revision
   *   Boolean indicating if method should create a new revision when saving
   *   the entity.
   *
   * @return bool
   *   Returned TRUE if the operation completed without errors.
   */
  public function reimportOpenApiSpecFile($save = TRUE, $new_revision = TRUE);

}
