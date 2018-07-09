<div class="column">
    <div class="columns">
        <div class="column">
            <h3 class="title is-5">Campaigns</h3>
            <table class="table is-fullwidth is-hoverable">
                <thead> 
                    <th>Id</th>
                    <th>Campaign</th>
                    <th>Segment</th>
                    <th>Budget</th>
                    <th></th>                    
             </thead>
             <?php foreach($campaign as $item): ?>
                <tr>
                    <td><?php echo  $item['id']?></td>
                    <td><?php echo  $item['campaign']?></td>
                    <td><?php echo  $item['segment']?></td>
                    <td><?php echo  $item['budget']?></td>
                    <td><a href="<?php echo base_url()?>index.php/projects/view_project/<?php echo $item['id']?>">View</a></td>
                </tr>
                  <?php endforeach ?>
            </table>
        </div>
        <div class="column is-3">
            <?php echo form_open('projects/add_campaign/') ?>
            <div class="field">
                <label class="label">Campaign</label>
                <div class="control">
                    <input class="input" name="campaign" type="text" required placeholder="Text input"> </div>
            </div> 
             <div class="field">
                <label class="label">Segment</label>
                <div class="control">
                    <div class="select">
                        <select name="segment" required>
                            <option value="digital">Digital</option>
                            <option value="retail">Retail</option>
                            <option value="business">Business</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="field">
                <label class="label">Budget</label>
                <div class="control">
                    <input class="input" name="budget" type="number" required placeholder="Text input"> </div>
            </div>
             <div class="field">
                <label class="label">Description</label>
                <div class="control">
                    <textarea class="textarea" name="description" required placeholder="Textarea"></textarea>
                </div>
            </div>
             <div class="field is-grouped">
                <div class="control">
                    <button class="button is-link" type="submit">Submit</button>
                </div>
                <div class="control">
                    <button class="button is-text" type="reset">Cancel</button>
                </div>
            </div>
              <?php echo form_close() ?>
        </div>
    </div>
</div>