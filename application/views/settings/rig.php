<div class="config_panel" id="rig">
        <form>                        
                <h2>Rig Settings</h2>
                <fieldset>
                        <fieldset>
                                <table>
                                        <tr>
                                                <td class="label_m"><label>Rig Name:</label></td>
                                                <td><input type="text" style="width:150px;" disabled="disabled" value="<?= $project['rig'] ?>" class="rigname" /></td>
                                        </tr>
                                        <tr>
                                                <td class="label_m"><label>Rig Capacity:</label></td>
                                                <td><input name="capacity" type="text" style="width:150px;" value="<?= !empty($rig['capacity']) ? $rig['capacity'] : ''; ?>" />hp</td>                                                
                                        </tr>
                                        <tr>
                                                <td class="label_m"><label>Stand Lenght:</label></td>
                                                <td>
                                                        <select name="stand_lenght" style="width:164px;">
                                                                <option value="">Select...</option>
                                                                <option value="single" <?= (!empty($rig['stand_lenght']) && $rig['stand_lenght']=='single') ? 'selected' : ''; ?>>Single</option>
                                                                <option value="double" <?= (!empty($rig['stand_lenght']) && $rig['stand_lenght']=='double') ? 'selected' : ''; ?>>Double</option>
                                                                <option value="triple" <?= (!empty($rig['stand_lenght']) && $rig['stand_lenght']=='triple') ? 'selected' : ''; ?>>Triple</option>
                                                        </select>
                                                </td>
                                        </tr>
                                        <tr>
                                                <td class="label_m"><label>Power Unit:</label></td>
                                                <td>
                                                        <select name="power_unit" style="width:164px;">
                                                                <option value="">Select...</option>
                                                                <option value="kelly" <?= (!empty($rig['power_unit']) && $rig['power_unit']=='kelly') ? 'selected' : ''; ?>>Kelly</option>
                                                                <option value="top_drive" <?= (!empty($rig['power_unit']) && $rig['power_unit']=='top_drive') ? 'selected' : ''; ?>>Top Drive</option>
                                                                <option value="power_swivel" <?= (!empty($rig['power_unit']) && $rig['power_unit']=='power_swivel') ? 'selected' : ''; ?>>Power Swivel</option>
                                                        </select>
                                                </td>
                                        </tr>
                                </table>
                        </fieldset>


                        <fieldset>
                                <legend>Anular System BOP's</legend>
                                <table>
                                        <tr>
                                                <td class="label_m"><label>Model:</label></td>
                                                <td><input name="anular_model" type="text" value="<?= !empty($rig['anular_model']) ? $rig['anular_model'] : ''; ?>" style="width:150px;" /></td>
                                        </tr>
                                        <tr>
                                                <td class="label_m"><label>Nominal Cap.:</label></td>
                                                <td><input name="anular_capacity" type="text" value="<?= !empty($rig['anular_capacity']) ? $rig['anular_capacity'] : ''; ?>" style="width:150px;" />Psi.</td>
                                        </tr>
                                </table>
                        </fieldset>
                        <fieldset>
                                <legend>Rams System BOP's</legend>
                                <table>
                                        <tr>
                                                <td class="label_m"><input type="checkbox" class="cb_piperam" name="pipe_ram" value="1" <?= !empty($rig['pipe_ram']) ? 'checked' : ''; ?> /></td>
                                                <td class="label_m"><label>Pipe ram</label></td>
                                                <td></td>
                                        </tr>
                                        <tr class="pipe_ram" <?= empty($rig['pipe_ram']) ? 'style="display:none;"' : ''; ?>>
                                                <td class="label_m"></td>
                                                <td class="label_m"><label>Model:</label></td>
                                                <td><input type="text" name="pipe_ram_model" class="pipe_ram" value="<?= !empty($rig['pipe_ram_model']) ? $rig['pipe_ram_model'] : ''; ?>" style="width:150px;" /></td>
                                        </tr>
                                        <tr class="pipe_ram" <?= empty($rig['pipe_ram']) ? 'style="display:none;"' : ''; ?>>
                                                <td></td>
                                                <td class="label_m"><label>Nominal Cap.:</label></td>
                                                <td><input type="text" name="pipe_ram_capacity" class="pipe_ram" value="<?= !empty($rig['pipe_ram_capacity']) ? $rig['pipe_ram_capacity'] : ''; ?>" style="width:150px;" />Psi.</td>
                                        </tr>
                                        <tr>
                                                <td class="label_m"><input type="checkbox" class="cb_blindram" name="blind_ram" value="1" <?= !empty($rig['blind_ram']) ? 'checked' : ''; ?>/></td>
                                                <td class="label_m"><label>Blind ram</label></td>
                                                <td></td>
                                        </tr>
                                        <tr class="blindram" <?= empty($rig['blind_ram']) ? 'style="display:none;"' : ''; ?>>
                                                <td class="label_m"></td>
                                                <td class="label_m"><label>Model:</label></td>
                                                <td><input name="blind_ram_model" type="text" class="blind_ram" value="<?= !empty($rig['blind_ram_model']) ? $rig['blind_ram_model'] : ''; ?>" style="width:150px;" /></td>
                                        </tr>
                                        <tr class="blindram" <?= empty($rig['blind_ram']) ? 'style="display:none;"' : ''; ?>>
                                                <td></td>
                                                <td class="label_m"><label>Nominal Cap.:</label></td>
                                                <td><input name="blind_ram_capacity" type="text" class="blind_ram" value="<?= !empty($rig['blind_ram_capacity']) ? $rig['blind_ram_capacity'] : ''; ?>" style="width:150px;" />Psi.</td>
                                        </tr>
                                        <tr>
                                                <td class="label_m"><input type="checkbox" class="cb_shearram" name="shear_ram"  value="1" <?= !empty($rig['shear_ram']) ? 'checked' : ''; ?>/></td>
                                                <td class="label_m"><label>Shear ram</label></td>
                                                <td></td>
                                        </tr>
                                        <tr class="shearram" <?= empty($rig['shear_ram']) ? 'style="display:none;"' : ''; ?>>
                                                <td class="label_m"></td>
                                                <td class="label_m"><label>Model:</label></td>
                                                <td><input name="shear_ram_model" type="text" class="shear_ram" value="<?= !empty($rig['shear_ram_model']) ? $rig['shear_ram_model'] : ''; ?>" style="width:150px;" /></td>
                                        </tr>
                                        <tr class="shearram" <?= empty($rig['shear_ram']) ? 'style="display:none;"' : ''; ?>>
                                                <td></td>
                                                <td class="label_m"><label>Nominal Cap.:</label></td>
                                                <td><input name="shear_ram_capacity" type="text" class="shear_ram" value="<?= !empty($rig['shear_ram_capacity']) ? $rig['shear_ram_capacity'] : ''; ?>" style="width:150px;" />Psi.</td>
                                        </tr>
                                </table>
                        </fieldset>
                                                
                        <?= !empty($rig['id']) ? '<input type="hidden" value="'.$rig["id"].'" name="id">' : ''; ?>                        
                        <input type="hidden" value="<?= $project['rig'] ?>" name="name" />
                        <input type="hidden" value="<?= $project['id']; ?>" name="project_id">
                        <input type="button" value="Update Rig Settings" style="margin-top:20px; " id="rig_form_submit">

                </fieldset>        
        </form>
</div>