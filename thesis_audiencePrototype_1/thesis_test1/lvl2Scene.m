//
//  lvl2Scene.m
//  HeartCharacterV2
//
//  Created by compagnb on 3/8/14.
//  Copyright (c) 2014 compagnb. All rights reserved.
//

#import "lvl2Scene.h"

@implementation lvl2Scene

{
    //defining array
    SKSpriteNode *_anxietyMedLow;
    NSArray *_lvl2WaveFrames;
    
}

-(id)initWithSize:(CGSize)size {
    if (self = [super initWithSize:size]) {
        /* Setup your scene here */
        
        //background color blue
        self.backgroundColor = [SKColor blueColor];
        
        // set up paddling array to hold the frames
        NSMutableArray *waveFrames = [NSMutableArray array];
        
        //load and set up texture atlas
        SKTextureAtlas *lvl2AnimatedAtlas = [SKTextureAtlas atlasNamed:@"anxietyMedLow"];
        
        //gather the list of names from the atlas folder
        int numbImages = lvl2AnimatedAtlas.textureNames.count;
        for (int i=1; i<= numbImages; i++){
            NSString *textureName = [NSString stringWithFormat: @"anxietyMed%d", i];
            SKTexture *temp = [lvl2AnimatedAtlas textureNamed:textureName];
            [waveFrames addObject:temp];
        }
        _lvl2WaveFrames = waveFrames;
        
        //create the surfer and set it to the middle of the screen
        SKTexture *temp= _lvl2WaveFrames[0];
        _anxietyMedLow = [SKSpriteNode spriteNodeWithTexture:temp];
        _anxietyMedLow.position = CGPointMake(CGRectGetMidX(self.frame), CGRectGetMidY(self.frame));
        [self addChild: _anxietyMedLow];
        
        //start paddling
        [self anxietyMedLowWaves];
        
    }
    
    return self;
}

//creating a new animation method
-(void)anxietyMedLowWaves
{
    [_anxietyMedLow runAction:[SKAction repeatActionForever:[SKAction animateWithTextures:_lvl2WaveFrames timePerFrame:0.5f resize:NO restore:YES]] withKey:@"anxietyMedLowWaves"];
    return;
}

-(void)update:(CFTimeInterval)currentTime {
    /* Called before each frame is rendered */
}

@end

